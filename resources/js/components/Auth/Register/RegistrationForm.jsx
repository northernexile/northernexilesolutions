import React, {useEffect} from "react";
import {Card, CardContent, CardHeader, CircularProgress, Grid, TextField} from "@mui/material";
import Button from "@mui/material/Button";
import {useAppDispatch,useAppSelector} from "../../../redux/hooks/hooks";
import {useForm} from 'react-hook-form'
import {registerUser} from "../../../redux/actions/auth/authActions";
import {Link, useNavigate} from "react-router-dom";

const RegistrationForm = () => {
    const { loading, userInfo, error, success } = useAppSelector(
        (state) => state.auth
    )
    const dispatch = useAppDispatch()
    const navigate = useNavigate()

    useEffect(() => {
        // redirect user to login page if registration was successful
        if (success) navigate('/login')
        // redirect authenticated user to profile screen
        //if (userInfo) navigate('/user-profile')
    }, [navigate, userInfo, success])

    const {register,handleSubmit} = useForm()
    const submitForm = (data) => {
        if(data.password !== data.repeat){
            console.log('password mismatch')
        }

        data.email = data.email.toLowerCase()

        const registration = {
            name:data.name,
            email:data.email,
            password:data.password,
            confirmed:data.repeat
        }
        dispatch(registerUser(registration))
    }

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
                <CardHeader className={`title-bar`} title={`Register`}/>
                <CardContent>
                    <form onSubmit={handleSubmit(submitForm)}>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="name-input"
                                name="name"
                                label="Name"
                                type="text"
                                {...register('name')}
                                required
                            />
                        </div>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="email-input"
                                name="email"
                                label="Email address"
                                type="email"
                                {...register('email')}
                                required
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
                                required
                            />
                        </div>
                        <div className={`form-row`}>
                            <TextField
                                fullWidth
                                id="password-input-repeat"
                                name="repeat"
                                label="Confirm Password"
                                type="password"
                                {...register('repeat')}
                                required
                            />
                        </div>
                        <div className={`form-row`}>
                            <Button disabled={loading} variant="contained" color="primary" type="submit">
                                {loading ? <CircularProgress />: 'Register'}
                            </Button>
                        </div>
                        <div className={`form-row`}>
                            <Link to={`/login`}>Login</Link>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </Grid>
    )
}

export default RegistrationForm
