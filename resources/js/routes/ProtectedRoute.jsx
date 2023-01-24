import {useAppSelector} from "../redux/hooks/hooks";
import {Link, NavLink, Outlet} from 'react-router-dom'
import React from "react";
import ButtonAppBar from "../components/Header/Header";
import CompanyInfo from "../components/Home/CompanyInfo";
import SiteBottomNavigation from "../components/Footer/BottomNavigation";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import Typography from "@mui/material/Typography";

const ProtectedRoute = () => {
    const {userInfo} = useAppSelector((state) => state.auth)

    if (!userInfo) {
        return (
            <>
                <div id="header">
                    <ButtonAppBar/>
                </div>
                <div id="content">
                    <Grid item xs={12}>
                        <Card elevation={2}
                              style={{
                                  paddingTop: 0,
                                  paddingLeft: 0,
                                  paddingRight: 0,
                                  paddingBottom: 8,
                                  margin: 8,
                                  marginTop: 80,
                                  marginBottom: 32,
                                  backgroundColor: 'rgba(255,255,255,0.8)'
                              }}
                        >
                            <CardHeader className={`title-bar`} title={`Unauthorized`}/>
                            <CardContent>
                                <div className='unauthorized'>
                                    <Typography variant="p" component="div">You don't have permission to access this resource.</Typography>
                                    <span><Link to='/login'>Login</Link> to gain access</span>
                                </div>
                            </CardContent>
                        </Card>
                    </Grid>
                </div>
                <div id="footer">
                    <CompanyInfo/>
                    <SiteBottomNavigation/>
                </div>
            </>
        )
    }

    return (<>
        <div id="header">
            <ButtonAppBar/>
        </div>
        <div id="content">
            <Outlet/>
        </div>
        <div id="footer">
            <CompanyInfo/>
            <SiteBottomNavigation/>
        </div>
    </>)
}

export default ProtectedRoute
