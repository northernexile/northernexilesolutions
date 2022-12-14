import React, { useState } from "react";
import {Grid, TextField} from "@mui/material";
import Button from "@mui/material/Button";

const defaults = {
    email:'',
    password:''
}

const LoginForm = () => {
    const [formValues, setFormValues] = useState(defaults);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormValues({
            ...formValues,
            [name]: value,
        });
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        console.log(formValues);
    };

    return (
        <form onSubmit={handleSubmit}>
            <Grid container alignItems="center" justify="center" direction="column">
                <Grid item>
                    <TextField
                        id="email-input"
                        name="email"
                        label="Email address"
                        type="email"
                        value={formValues.name}
                        onChange={handleInputChange}
                    />
                </Grid>
                <Grid item>
                    <TextField
                        id="password-input"
                        name="password"
                        label="Password"
                        type="password"
                        value={formValues.password}
                        onChange={handleInputChange}
                    />
                </Grid>
                <Button variant="contained" color="primary" type="submit">
                    Login
                </Button>
            </Grid>
        </form>
    )
}

export default LoginForm
