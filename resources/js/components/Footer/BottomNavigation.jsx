
import * as React from 'react';
import Box from '@mui/material/Box';
import BottomNavigation from '@mui/material/BottomNavigation';
import BottomNavigationAction from '@mui/material/BottomNavigationAction';
import {Person2,Home,Contacts} from "@mui/icons-material";
import {Link} from "react-router-dom";

export default function SiteBottomNavigation() {
    const [value, setValue] = React.useState(0);

    return (
        <Box sx={{ width: 500 }}>
            <BottomNavigation
                showLabels
                value={value}
                onChange={(event, newValue) => {
                    setValue(newValue);
                }}
            >
                <BottomNavigationAction
                    component={Link}
                    to="/"
                    label="Home"
                    icon={<Home />}
                />
                <BottomNavigationAction
                    component={Link}
                    to={"resume"}
                    label="Profile"
                    icon={<Person2 />}
                />
                <BottomNavigationAction
                    component={Link}
                    to={"contact"}
                    label="Contact"
                    icon={<Contacts />}
                />
            </BottomNavigation>
        </Box>
    );
}
