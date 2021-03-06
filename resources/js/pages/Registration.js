import React, { Component } from "react";
import { connect } from "react-redux";
import { Route, Redirect } from "react-router-dom";
import { Row, Col, Form, Button, Alert, Card } from "react-bootstrap";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions";
import { register } from "../data/api";
import JumbotronWelcome from "../components/JumbotronWelcome";

class Registration extends Component {
  constructor(props) {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleEmail = this.handleEmail.bind(this);
    this.handleFirstName = this.handleFirstName.bind(this);
    this.handleLastName = this.handleLastName.bind(this);
    this.handlePassword = this.handlePassword.bind(this);
    this.handleMatchPassword = this.handleMatchPassword.bind(this);
    this.handleLogin = this.handleLogin.bind(this);
    this.updateValidator = this.updateValidator.bind(this);
    this.updateValidatorAnswer = this.updateValidatorAnswer.bind(this);
    this.state = {
      error: "",
      errors: {
        email: false,
        password: false,
      },
      verify: false,
      formSubmitting: false,
      user: {
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      validatorAnswer: 0,
      validatorValue: -1,
    };
  }

  handleLogin(e) {
    e.preventDefault();
    window.open("/login");
  }

  handleSubmit(e) {
    e.preventDefault();
    this.setState({ formSubmitting: true });
    register(this.state.user)
      .then((res) => {
        this.setState({
          error: "",
          errors: { email: false, password: false },
          verify: res.message,
        });
        this.updateValidator();
      })
      .catch((err) => {
        this.setState({
          error: err.message,
          errors: err.errors,
          verify: false,
        });
        this.updateValidator();
      });
  }

  handleEmail(e) {
    let value = e.target.value;
    this.setState((prevState) => ({
      user: { ...prevState.user, email: value },
    }));
  }

  handleFirstName(e) {
    let value = e.target.value;
    this.setState((prevState) => ({
      user: { ...prevState.user, firstName: value },
    }));
  }

  handleLastName(e) {
    let value = e.target.value;
    this.setState((prevState) => ({
      user: { ...prevState.user, lastName: value },
    }));
  }

  handlePassword(e) {
    let value = e.target.value;
    this.setState((prevState) => ({
      user: { ...prevState.user, password: value },
    }));
  }

  handleMatchPassword(e) {
    let value = e.target.value;
    this.setState((prevState) => ({
      user: { ...prevState.user, password_confirmation: value },
    }));
  }

  renderErrors(errors, errorType) {
    if (errorType === "confirm") {
      errors = errors.filter((x) => x.includes("match"));
    }
    if (errorType === "password") {
      errors = errors.filter((x) => !x.includes("match"));
      errors = errors.map((x) => {
        x = x.includes("invalid")
          ? "The password must contains Uppercase, lowercase and numeric value"
          : x;
        return x;
      });
    }
    return errors.map((x) => (
      <Form.Text key={x} className="text-danger">
        {x}
      </Form.Text>
    ));
  }

  updateValidator() {
    const captchaNumber = document.getElementById("captcha-number");
    if (captchaNumber.childNodes[0]) {
      captchaNumber.removeChild(captchaNumber.childNodes[0]);
    }
    let validatorX = Math.floor(Math.random() * 9) + 1;
    let validatorY = Math.floor(Math.random() * 9) + 1;
    var canv = document.createElement("canvas");
    canv.width = 100;
    canv.height = 50;
    let ctx = canv.getContext("2d");
    ctx.font = "35px Georgia";
    ctx.strokeText(validatorX + "+" + validatorY, 0, 30);
    this.setState({ validatorValue: validatorX + validatorY });
    captchaNumber.appendChild(canv);
  }

  updateValidatorAnswer(e) {
    let value = e.target.value !== "" ? parseInt(e.target.value) : 0;
    this.setState({ validatorAnswer: value });
  }

  componentDidMount() {
    this.updateValidator();
  }

  render() {
    let error = this.state.error === "" ? false : this.state.error;
    let user = this.props.value.user;
    if (user.login) {
      return <Redirect to="/" />;
    }
    let valid =
      this.state.validatorAnswer === 0
        ? true
        : this.state.validatorAnswer === this.state.validatorValue;
    let disabled = this.state.validatorAnswer !== this.state.validatorValue;
    return (
      <>
        <JumbotronWelcome text={false} />
        <div className="page-content has-jumbotron">
          <Row className="justify-content-md-center">
            <Col md={6}>
              {error ? (
                <Alert
                  variant={"danger"}
                  onClose={() => this.setState({ error: "" })}
                  dismissible
                >
                  {this.state.error}
                </Alert>
              ) : (
                ""
              )}
              {this.state.verify ? (
                <Alert
                  variant={"success"}
                  onClose={() => this.setState({ verify: false })}
                  dismissible
                >
                  {this.state.verify}
                </Alert>
              ) : (
                ""
              )}
              <Card>
                <Card.Header>Register</Card.Header>
                <Card.Body>
                  <Form onSubmit={this.handleSubmit}>
                    <Row>
                      <Col md={6}>
                        <Form.Group
                          controlId="formBasicFirstName"
                          onChange={this.handleFirstName}
                        >
                          <Form.Label>First Name</Form.Label>
                          <Form.Control type="text" placeholder="First Name" />
                        </Form.Group>
                      </Col>
                      <Col md={6}>
                        <Form.Group
                          controlId="formBasicLastName"
                          onChange={this.handleLastName}
                        >
                          <Form.Label>Last Name</Form.Label>
                          <Form.Control type="text" placeholder="Last Name" />
                        </Form.Group>
                      </Col>
                    </Row>
                    <Form.Group
                      controlId="formBasicEmail"
                      onChange={this.handleEmail}
                    >
                      <Form.Label>Email address</Form.Label>
                      <Form.Control type="email" placeholder="Enter email" />
                      {this.state.errors.email ? (
                        this.renderErrors(this.state.errors.email, "email")
                      ) : (
                        <Form.Text className="text-muted">
                          We'll never share your email with anyone else.
                        </Form.Text>
                      )}
                    </Form.Group>
                    <Form.Group
                      controlId="formBasicPassword"
                      onChange={this.handlePassword}
                    >
                      <Form.Label>Password</Form.Label>
                      <Form.Control type="password" placeholder="Password" />
                      {this.state.errors.password
                        ? this.renderErrors(
                            this.state.errors.password,
                            "password"
                          )
                        : ""}
                    </Form.Group>
                    <Form.Group
                      controlId="formBasicConfirmPassword"
                      onChange={this.handleMatchPassword}
                    >
                      <Form.Label>Confirm Password</Form.Label>
                      <Form.Control
                        type="password"
                        placeholder="Confirm Password"
                      />
                      {this.state.errors.password
                        ? this.renderErrors(
                            this.state.errors.password,
                            "confirm"
                          )
                        : ""}
                    </Form.Group>
                    <Form.Group onChange={this.updateValidatorAnswer}>
                      <div id="captcha-number"></div>
                      <Form.Control
                        type="number"
                        placeholder="Enter Value"
                      />{" "}
                      {valid ? (
                        ""
                      ) : (
                        <Form.Text className="text-danger">
                          Please enter correct value
                        </Form.Text>
                      )}
                    </Form.Group>

                    <Row>
                      <Col md={12}>
                        <Button
                          variant={disabled ? "secondary" : "primary"}
                          type="submit"
                          disabled={disabled}
                        >
                          Register
                        </Button>
                      </Col>
                    </Row>
                  </Form>
                </Card.Body>
                <Card.Footer>
                  Already have account?
                  <span
                    onClick={(e) => this.handleLogin(e)}
                    className="span-link"
                  >
                    Login
                  </span>
                </Card.Footer>
              </Card>
            </Col>
          </Row>
        </div>
      </>
    );
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Registration);
