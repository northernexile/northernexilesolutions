import React, {useState} from "react";
import {Card, CardContent, CardHeader, Grid, TextField} from "@mui/material";
import Button from "@mui/material/Button";
import {Link} from "react-router-dom";

const defaults = {
    email: '',
    password: ''
}

const LoginForm = () => {
    const [formValues, setFormValues] = useState(defaults);

    const handleInputChange = (e) => {
        const {name, value} = e.target;
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
        <Grid item xs={8}>
            <Card elevation={2}
                  style={{
                      paddingTop: 0,
                      paddingLeft: 0,
                      paddingRight: 0,
                      paddingBottom: 8,
                      margin: 8,
                      marginBottom: 32,
                      backgroundColor: 'rgba(255,255,255,0.8)'
                  }}
            >
                <CardHeader className={`title-bar`} title={`Login`}/>
                <CardContent>
                    <form onSubmit={handleSubmit}>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="email-input"
                                name="email"
                                label="Email address"
                                type="email"
                                value={formValues.name}
                                onChange={handleInputChange}
                            />
                        </div>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="password-input"
                                name="password"
                                label="Password"
                                type="password"
                                value={formValues.password}
                                onChange={handleInputChange}
                            />
                        </div>
                        <div className={`form-row`}>
                            <Button variant="contained" color="primary" type="submit">Login</Button>
                        </div>
                        <div className={`form-row`}>
                            <Link to={`/register`}>Register</Link>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </Grid>
    )
}

export default LoginForm
