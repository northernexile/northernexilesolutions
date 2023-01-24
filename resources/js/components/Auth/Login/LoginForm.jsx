import React, {useEffect, useState} from "react";
import {Card, CardContent, CardHeader, CircularProgress, Grid, TextField} from "@mui/material";
import Button from "@mui/material/Button";
import {Link, useNavigate} from "react-router-dom";
import {useForm} from 'react-hook-form'
import {useAppDispatch,useAppSelector} from "../../../redux/hooks/hooks";
import {userLogin} from "../../../redux/actions/auth/authActions";

const LoginForm = () => {

    const { loading,userInfo, error } = useAppSelector((state) => state.auth || {})
    const dispatch = useAppDispatch()
    const navigate = useNavigate()
    const { register, handleSubmit } = useForm()

    const submitForm = (data) => {

        let login = {
            email:data.email,
            password:data.password
        }

        dispatch(userLogin(login))
    }

    useEffect(() => {
        if (userInfo) {
            navigate('/')
        }
    }, [navigate, userInfo])

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
                    <form onSubmit={handleSubmit(submitForm)}>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="email-input"
                                name="email"
                                label="Email address"
                                type="email"
                                {...register('email')}
                            />
                        </div>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="password-input"
                                name="password"
                                label="Password"
                                type="password"
                                {...register('password')}
                            />
                        </div>
                        <div className={`form-row`}>
                            <Button variant="contained" color="primary" type="submit">
                                {loading ? <CircularProgress /> : 'Login'}
                            </Button>
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
