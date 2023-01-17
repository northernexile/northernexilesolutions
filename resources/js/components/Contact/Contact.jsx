
import React from "react";
import {Card, CardContent, CardHeader, Grid, TextField} from "@mui/material";
import Button from "@mui/material/Button";

export default function Contact() {
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
                    <form>
                        <div className={`form-row`}>
                            <TextField name={`name`} className={`form-input form-input-text`} fullWidth label={`Name`} />
                        </div>
                        <div className={`form-row`}>
                            <TextField name={`email`} className={`form-input form-input-text`} fullWidth label={`Email`} />
                        </div>
                        <div className={`form-row`}>
                            <TextField name={`message`} className={`form-input form-input-text`} fullWidth multiline rows={6} label={`Message`} />
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
