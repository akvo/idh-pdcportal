import React, { useState } from "react";
import { connect } from "react-redux";
import { Link, Route, Redirect } from "react-router-dom";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions";
import { Row, Col, Form, Button, Alert, Card } from "react-bootstrap";
import { login } from "../data/api";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import JumbotronWelcome from "../components/JumbotronWelcome";
import axios from "axios";

const Login = (props) => {
  const [password, setPassword] = useState(null);
  const [email, setEmail] = useState(null);
  const [error, setError] = useState(false);
  const [verify, setVerify] = useState(false);
  const { value: state } = props;
  const { user: userAction } = props;

  const onRegister = (e) => {
    e.preventDefault();
    window.open("/register");
  };

  const submit = (e) => {
    e.preventDefault();
    login({ email: email, password: password })
      .then((res) => {
        userAction.login(res);
        localStorage.setItem("access_token", res.access_token);
      })
      .catch((e) => {
        setError(e.error);
        setVerify(e.verify);
        localStorage.removeItem("access_token");
      });
  };

  if (state.user.login) {
    return <Redirect to="/" />;
  }

  return (
    <div>
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
                {error}
                {verify ? (
                  <span
                    onClick={(e) => e.preventDefault()}
                    className="span-link"
                  >
                    Resend email verification
                  </span>
                ) : (
                  ""
                )}
              </Alert>
            ) : (
              ""
            )}
            <Card>
              <Card.Header>Login</Card.Header>
              <Card.Body>
                <Form onSubmit={submit}>
                  <Form.Group
                    controlId="formBasicEmail"
                    onChange={(e) => setEmail(e.target.value)}
                  >
                    <Form.Label>Email address</Form.Label>
                    <Form.Control type="email" placeholder="Enter email" />
                    <Form.Text className="text-muted">
                      We'll never share your email with anyone else.
                    </Form.Text>
                  </Form.Group>
                  <Form.Group
                    controlId="formBasicPassword"
                    onChange={(e) => setPassword(e.target.value)}
                  >
                    <Form.Label>Password</Form.Label>
                    <Form.Control type="password" placeholder="Password" />
                  </Form.Group>
                  <Row>
                    <Col md={7}>
                      <Button variant="success" type="submit">
                        Submit
                      </Button>
                    </Col>
                    <Col md={5} className="text-right">
                      <Link to="/forgot_password">
                        <FontAwesomeIcon
                          className="mr-2"
                          icon={["fas", "key"]}
                        />
                        Forgot Password
                      </Link>
                    </Col>
                  </Row>
                </Form>
              </Card.Body>
              <Card.Footer>
                Don't have any account?
                <span onClick={onRegister} className="span-link">
                  Register
                </span>
              </Card.Footer>
            </Card>
          </Col>
        </Row>
      </div>
    </div>
  );
};

export default connect(mapStateToProps, mapDispatchToProps)(Login);
