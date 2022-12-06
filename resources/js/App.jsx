// resources/js/App.jsx
import React from 'react';
import { createRoot } from 'react-dom/client'
import ButtonAppBar from "./components/Header/Header";
import { ThemeProvider } from "@mui/material";
import { appTheme } from "./components/Theme/Theme";

export default function App(){
    return(
        <div>
            <ThemeProvider theme={appTheme}>
                <ButtonAppBar />
            </ThemeProvider>
        </div>
    );
}

if(document.getElementById('app')){
    createRoot(document.getElementById('app')).render(<App />)
}
