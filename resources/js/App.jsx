// resources/js/App.jsx
import React from 'react';
import { createRoot } from 'react-dom/client'
import ReactDOM from "react-dom/client";
import { ThemeProvider } from "@mui/material";
import { appTheme } from "./components/Theme/Theme";
import Root from "./routes/root"
import ErrorPage from "./errors/ErrorPage";
import Login from "./components/Auth/Login/Login";
import Home from "./components/Home/Home"
import Resume from "./components/Resume/Resume";
import {
    createBrowserRouter,
    RouterProvider,
    Route,
}from "react-router-dom";
import Logout from "./components/Auth/Logout/Logout";
import Contact from "./components/Contact/Contact";
import {Provider} from "react-redux"
import store from "./redux/index"
import Register from "./components/Auth/Register/Register";
import ProtectedRoute from "./routes/ProtectedRoute";
import Dashboard from "./components/Dashboard/Dashboard"
import Messages from "./components/Dashboard/Messages/Messages";
import MessageEdit from "./components/Dashboard/Messages/MessageEdit";
import {ToastContainer} from "react-toastify";
import Experience from "./components/Dashboard/Experience/Experience";
import ExperienceCreate from "./components/Dashboard/Experience/ExperienceCreate";


const router = createBrowserRouter([
    {
        path: "/",
        element: <Root />,
        errorElement: <ErrorPage />,
        children: [
            {
                index: true,
                element: <Home />
            },
            {
                path: "login",
                element: <Login />
            },
            {
                path: "Register",
                element:<Register />
            },
            {
                path: "logout",
                element: <Logout />
            },
            {
                path: "register",
                element: <Register />
            },
            {
                path: "resume",
                element: <Resume />
            },
            {
                path: "contact",
                element: <Contact />
            },
        ]
    },
    {
        path:'/dashboard',
        element:<ProtectedRoute />,
        children:[
            {
                index:true,
                element: <Dashboard />
            },
            {
                path:"/dashboard/messages",
                element: <Messages />,
            },
            {
                path: "/dashboard/messages/:id",
                element: <MessageEdit />
            },
            {
                path:"/dashboard/experience",
                element: <Experience />
            },
            {
                path:"/dashboard/experience/create",
                element:<ExperienceCreate />
            }
        ]
    }
]);

ReactDOM.createRoot(document.getElementById("root")).render(
    <React.StrictMode>
        <Provider store={store}>
            <ThemeProvider theme={appTheme}>
                <RouterProvider router={router} />
            </ThemeProvider>
            <ToastContainer />
        </Provider>
    </React.StrictMode>
);

if(document.getElementById('app')){
    createRoot(document.getElementById('app')).render(<App />)
}
