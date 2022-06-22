import React, { useEffect } from "react";
import { connect } from "react-redux";
import { BrowserRouter, Switch, Route, Redirect } from "react-router-dom";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions";
import Navigation from "./Navigation";
import Filters from "./Filters";
import { Container } from "react-bootstrap";
import Loading from "./Loading";
import Home from "../pages/Home";
import Country from "../pages/Country";
import Compare from "../pages/Compare";
import Login from "../pages/Login";
import Setting from "../pages/Setting";
import Manage from "../pages/Manage";
import Logs from "../pages/Logs";
import Registration from "../pages/Registration";
import ForgotPassword from "../pages/ForgotPassword";
import Verify from "../pages/Verify";
import NotFound from "../pages/NotFound";
import { getApi, auth } from "../data/api";
import Methodology from "../pages/Methodology";

const now = new Date();
const cache_version = document
  .getElementsByName("cache-version")[0]
  .getAttribute("value");
const current_version = localStorage.getItem("cache-version");
let cachetime = localStorage.getItem("cache-time");
cachetime = cachetime
  ? new Date(parseInt(cachetime) + 60 * 60 * 1000)
  : new Date(0);

if (now > cachetime || cache_version !== current_version) {
  localStorage.clear();
}

const access_token = localStorage.getItem("access_token");

const Page = (props) => {
  const { value: state } = props;
  const { page } = state;
  const { loading } = page;
  const { user: userAction, page: pageAction } = props;

  useEffect(() => {
    if (access_token) {
      auth(access_token)
        .then((res) => {
          userAction.login(res);
        })
        .catch(() => {
          localStorage.removeItem("access_token");
        });
    } else {
      pageAction.loading(false);
    }
  }, []);

  useEffect(() => {
    if (now < cachetime && cache_version === current_version) {
      let caches = localStorage.getItem("caches");
      caches = JSON.parse(caches);
      pageAction.init(caches);
    } else {
      const calls = [getApi("filters")];
      Promise.all(calls).then((res) => {
        const caches = JSON.stringify(res[0]);
        pageAction.init(res[0]);
        localStorage.setItem("caches", caches);
        localStorage.setItem("cache-time", now.getTime());
        localStorage.setItem("cache-version", cache_version);
      });
    }
  }, []);

  return (
    <BrowserRouter>
      <Navigation />
      <Filters />
      {loading ? <Loading /> : ""}
      <Container className={"page-container"} fluid={true}>
        <Switch>
          <Route exact path="/">
            <Redirect to="/home" />
          </Route>
          <Route exact path="/home" component={Home} />
          <Route
            exact
            path="/country/:country/:companyId/:tab"
            component={Country}
          />
          <Route exact path="/compare" component={Compare} />
          <Route exact path="/methodology" component={Methodology} />
          <Route exact path="/setting" component={Setting} />
          <Route exact path="/manage-user" component={Manage} />
          <Route exact path="/logs" component={Logs} />

          <Route exact path="/login" component={Login} />
          <Route exact path="/register" component={Registration} />
          <Route exact path="/forgot_password" component={ForgotPassword} />
          <Route
            exact
            path="/forgot_password/:verifyToken"
            component={ForgotPassword}
          />
          <Route exact path="/verify/:verifyToken" component={Verify} />
          <Route exact path="/logout">
            <Redirect to="/login" />
          </Route>
          <Route
            render={function () {
              return <NotFound />;
            }}
          />
        </Switch>
      </Container>
    </BrowserRouter>
  );
};

export default connect(mapStateToProps, mapDispatchToProps)(Page);
