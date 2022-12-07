
import * as React from 'react';
import Box from '@mui/material/Box';
import BottomNavigation from '@mui/material/BottomNavigation';
import BottomNavigationAction from '@mui/material/BottomNavigationAction';
import {Person2,Home} from "@mui/icons-material";
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
                <BottomNavigationAction label="Profile" icon={<Person2 />} />
            </BottomNavigation>
        </Box>
    );
}
