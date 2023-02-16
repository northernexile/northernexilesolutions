import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import Drawer from '@mui/material/Drawer';
import {Link} from "react-router-dom";
import {Divider, List, ListItemButton, ListItemIcon, ListItemText} from "@mui/material";
import {useEffect, useState} from 'react';
import {
    ContactMail,
    Home,
    LoginRounded,
    Person,
    LogoutRounded,
    Dashboard,
    Mail,
    History,
    Factory, Code, Label, People
} from "@mui/icons-material";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks";
import {useGetUserDetailsQuery} from "../../redux/services/authService";
import {setCredentials, logout} from "../../redux/slices/authSlice";
export default function ButtonAppBar() {
    const [isDrawerOpen, setIsDrawerOpen] = useState(false);
    const dispatch = useAppDispatch();
    let {userInfo, isLoggedIn} = useAppSelector((state) => state.auth)

    const {data, isFetching} = useGetUserDetailsQuery('userDetails', {
        pollingInterval: 90000,
    })

    const out = () => {
        dispatch(logout())
    }

    const infoSection = () => {
        if (!userInfo) {
            return <Button color="inherit"><Link title={`Login`} to={`/login`}><LoginRounded/></Link></Button>
        } else {
            return <Button color={`inherit`} onClick={() => out()}><LogoutRounded/></Button>
        }
    }

    const adminLinks = () => {
        if (userInfo) {
            return <>
                <ListItemButton>
                    <ListItemIcon>
                        <Dashboard/>
                    </ListItemIcon>
                    <Link to={'/dashboard'}><ListItemText primary="Dashboard"/></Link>
                </ListItemButton>
                <ListItemButton>
                    <ListItemIcon>
                        <Mail/>
                    </ListItemIcon>
                    <Link to={'/dashboard/messages'}><ListItemText primary="Messages"/> </Link>
                </ListItemButton>
                <ListItemButton>
                    <ListItemIcon>
                        <History />
                    </ListItemIcon>
                    <Link to={`/dashboard/experience`}><ListItemText primary="Experience"/> </Link>
                </ListItemButton>
                <ListItemButton>
                    <ListItemIcon>
                        <People />
                    </ListItemIcon>
                    <Link to={`/dashboard/clients`}>
                        <ListItemText primary={"Clients"} />
                    </Link>
                </ListItemButton>
                <ListItemButton>
                    <ListItemIcon>
                        <Factory />
                    </ListItemIcon>
                    <Link to={`/dashboard/sectors`}><ListItemText primary="Sectors" /></Link>
                </ListItemButton>
                <ListItemButton>
                    <ListItemIcon>
                        <Code />
                    </ListItemIcon>
                    <Link to={`/dashboard/technologies`}><ListItemText primary="Technologies" /></Link>
                </ListItemButton>
                <ListItemButton>
                    <ListItemIcon>
                        <Label />
                    </ListItemIcon>
                    <Link to={`/dashboard/tags`}>
                        <ListItemText primary="Tags" />
                    </Link>
                </ListItemButton>
            </>
        }

        return ''
    }

    const publicLinks = () => {
        return <>
            <ListItemButton>
                <ListItemIcon>
                    <Home/>
                </ListItemIcon>
                <Link to={'/'}><ListItemText primary="Home"/></Link>
            </ListItemButton>
            <ListItemButton>
                <ListItemIcon>
                    <Person/>
                </ListItemIcon>
                <Link to={'/resume'}><ListItemText primary="Profile"/></Link>
            </ListItemButton>
            <ListItemButton>
                <ListItemIcon>
                    <ContactMail/>
                </ListItemIcon>
                <Link to={'/contact'}><ListItemText primary="Contact"/></Link>
            </ListItemButton>
            <Divider/>
        </>
    }

    useEffect(() => {
        if (data) dispatch(setCredentials(data))
    }, [data, dispatch])

    return (
        <Box sx={{flexGrow: 1}}>
            <AppBar position="fixed">
                <Toolbar>
                    <IconButton
                        size="large"
                        edge="start"
                        color="inherit"
                        aria-label="menu"
                        sx={{mr: 2}}
                        onClick={() => setIsDrawerOpen(true)}
                    >
                        <MenuIcon/>
                    </IconButton>
                    <Typography variant="h6" component="div" sx={{flexGrow: 1}}>
                        <Link to={`/`} title={`Home`}>
                            <img src={`/images/NorthernExileLogo.svg`} className={`site-logo`}
                                 title={`Northern Exile Solutions Ltd`}/>
                        </Link>
                    </Typography>

                    <Drawer open={isDrawerOpen} onClose={() => setIsDrawerOpen(false)}
                    >
                        <List>
                            {publicLinks()}
                            {adminLinks()}
                        </List>
                    </Drawer>
                    {infoSection()}
                </Toolbar>
            </AppBar>
        </Box>
    );
}
