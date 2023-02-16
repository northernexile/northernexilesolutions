// resources/js/App.jsx
import React, {StrictMode} from 'react';
import ReactDOM from "react-dom/client";
import { ThemeProvider } from "@mui/material";
import { appTheme } from "./components/Theme/Theme";
import {
    RouterProvider,
}from "react-router-dom";
import {Provider} from "react-redux"
import store from "./redux/index"

import {ToastContainer} from "react-toastify";
import routes  from "./routes/routes";
import {createRoot} from "react-dom";

const router = routes
const container = document.getElementById('root');
const root = createRoot(container)

root.render(
    <StrictMode>
        <Provider store={store}>
            <ThemeProvider theme={appTheme}>
                <RouterProvider router={router} />
            </ThemeProvider>
            <ToastContainer />
        </Provider>
    </StrictMode>
);
