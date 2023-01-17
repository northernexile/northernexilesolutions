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
import {List, ListItem, ListItemButton, ListItemIcon, ListItemText} from "@mui/material";
import {useState} from 'react';
import {ContactMail, Home, LoginRounded, Person} from "@mui/icons-material";

export default function ButtonAppBar() {
    const [isDrawerOpen, setIsDrawerOpen] = useState(false);

    return (
        <Box sx={{ flexGrow: 1 }}>
            <AppBar position="static">
                <Toolbar>
                    <IconButton
                        size="large"
                        edge="start"
                        color="inherit"
                        aria-label="menu"
                        sx={{ mr: 2 }}
                        onClick={() => setIsDrawerOpen(true)}
                    >
                        <MenuIcon />
                    </IconButton>
                    <Typography variant="h6" component="div" sx={{ flexGrow: 1 }}>
                        <img src={`/images/NorthernExileLogo.svg`} className={`site-logo`} title={`Northern Exile Solutions Ltd`} />
                    </Typography>
                    <Drawer open={isDrawerOpen} onClose={()=>setIsDrawerOpen(false)}
                    >
                        <List>
                            <ListItemButton>
                                <ListItemIcon>
                                    <Home />
                                </ListItemIcon>
                                <Link to={'/'}><ListItemText primary="Home" /></Link>
                            </ListItemButton>
                            <ListItemButton>
                                <ListItemIcon>
                                    <Person />
                                </ListItemIcon>
                                <Link to={'/resume'}><ListItemText primary="Profile" /></Link>
                            </ListItemButton>
                            <ListItemButton>
                                <ListItemIcon>
                                    <ContactMail />
                                </ListItemIcon>
                                <Link to={'/contact'}><ListItemText primary="Contact" /></Link>
                            </ListItemButton>
                        </List>
                    </Drawer>
                    <Button color="inherit"><Link title={`Login`} to={`login`}><LoginRounded /></Link></Button>
                </Toolbar>
            </AppBar>
        </Box>
    );
}
