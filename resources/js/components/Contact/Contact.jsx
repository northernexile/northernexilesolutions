
import React from "react";
import {Card, CardContent, CardHeader, Grid, TextField} from "@mui/material";
import Button from "@mui/material/Button";
import {useAppDispatch,useAppSelector} from "../../redux/hooks/hooks";
import {useForm} from "react-hook-form";
import {addContact} from "../../redux/actions/contactActions";

export default function Contact() {

    const dispatch = useAppDispatch();
    const contact = useAppSelector(state => state.contact.contact)
    const {register,handleSubmit} = useForm()

    console.log(contact)

    const submitForm = (data) => {
        dispatch(addContact(data))
    }

    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={{
                      paddingTop: 0,
                      paddingLeft:0,
                      paddingRight:0,
                      paddingBottom:8,
                      margin:8,
                      marginTop:80,
                      marginBottom:32,
                      backgroundColor:'rgba(255,255,255,0.8)'
                  }}
            >
                <CardHeader className={`title-bar`} title={`Get In Touch`}/>
                <CardContent>
                    <form onSubmit={handleSubmit(submitForm)}>
                        <div className={`form-row`}>
                            <TextField
                                name={`text`}
                                className={`form-input form-input-text`}
                                fullWidth
                                label={`Name`}
                                {...register('name')}
                            />
                        </div>
                        <div className={`form-row`}>
                            <TextField
                                name={`email`}
                                className={`form-input form-input-text`}
                                fullWidth
                                label={`Email`}
                                {...register('email')}
                            />
                        </div>
                        <div className={`form-row`}>
                            <TextField
                                name={`message`}
                                className={`form-input form-input-text`}
                                fullWidth
                                multiline
                                rows={6}
                                label={`Message`}
                                {...register('text')}
                            />
                        </div>
                        <div className={`form-row`}>
                            <Button variant={`contained`} type={`submit`}>Submit</Button>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </Grid>
    )
}
