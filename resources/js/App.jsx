// resources/js/App.jsx
import React from 'react';
import { createRoot } from 'react-dom/client'
import ReactDOM from "react-dom/client";
import { ThemeProvider } from "@mui/material";
import { appTheme } from "./components/Theme/Theme";
import Root from "./routes/root"
import ErrorPage from "./errors/ErrorPage";
import Login from "./components/Login/Login";
import {
    createBrowserRouter,
    RouterProvider,
    Route,
} from "react-router-dom";

const router = createBrowserRouter([
    {
        path: "/",
        element: <Root />,
        errorElement: <ErrorPage />,
        children: [
            {
                path: "login",
                element: <Login />
            }
        ]
    },
]);

ReactDOM.createRoot(document.getElementById("root")).render(
    <React.StrictMode>
        <ThemeProvider theme={appTheme}>
            <RouterProvider router={router} />
        </ThemeProvider>
    </React.StrictMode>
);

if(document.getElementById('app')){
    createRoot(document.getElementById('app')).render(<App />)
}
