import {createBrowserRouter} from "react-router-dom";
import Root from "./root";
import ErrorPage from "../errors/ErrorPage";
import Home from "../components/Home/Home";
import Login from "../components/Auth/Login/Login";
import Logout from "../components/Auth/Logout/Logout";
import Register from "../components/Auth/Register/Register";
import Resume from "../components/Resume/Resume";
import Contact from "../components/Contact/Contact";
import ProtectedRoute from "./ProtectedRoute";
import Dashboard from "../components/Dashboard/Dashboard";
import Messages from "../components/Dashboard/Messages/Messages";
import MessageEdit from "../components/Dashboard/Messages/MessageEdit";
import Experience from "../components/Dashboard/Experience/Experience";
import ExperienceCreate from "../components/Dashboard/Experience/ExperienceCreate";
import ExperienceEdit from "../components/Dashboard/Experience/ExperienceEdit";
import Sectors from "../components/Dashboard/Sectors/Sectors";
import Technologies from "../components/Dashboard/Technologies/Technologies";
import Tags from "../components/Dashboard/Tags/Tags";
import React from "react";

const routes = createBrowserRouter([
    {
        path: "/",
        element: <Root />,
        errorElement: <ErrorPage />,
        exact:true,
        children: [
            {
                index: true,
                element: <Home />,
                exact:true
            },
            {
                path: "/login",
                element: <Login />,
                exact: true
            },
            {
                path: "/logout",
                element: <Logout />,
                exact: true,
            },
            {
                path: "/register",
                element: <Register />,
                exact: true,
            },
            {
                path: "/resume",
                element: <Resume />,
                exact: true,
            },
            {
                path: "/contact",
                element: <Contact />,
                exact: true,
            },
        ]
    },
    {
        path:'/dashboard',
        element:<ProtectedRoute />,
        exact: true,
        children:[
            {
                index:true,
                element: <Dashboard />,
                exact: true,
            },
            {
                path:"/dashboard/messages",
                element: <Messages />,
                exact: true,
            },
            {
                path: "/dashboard/messages/:id",
                element: <MessageEdit />,
                exact: true,
            },
            {
                path:"/dashboard/experience",
                element: <Experience />,
                exact: true,
            },
            {
                path:"/dashboard/experience/create",
                element:<ExperienceCreate />,
                exact: true
            },
            {
                path: "/dashboard/experience/:id",
                element: <ExperienceEdit />,
                exact: true
            },
            {
                path: "/dashboard/sectors",
                element:<Sectors />,
                exact: true
            },
            {
                path: "/dashboard/technologies",
                element:<Technologies />,
                exact: true,
            },
            {
                path: "/dashboard/tags",
                element: <Tags />,
                exact: true,
            }
        ]
    }
]);

export default routes;
