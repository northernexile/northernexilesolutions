
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {Factory, History, Label, Mail} from "@mui/icons-material";
import {Link} from "react-router-dom";
export default function Dashboard() {

    const sections = [
        {
            id:1,
            name:'Messages',
            icon:<Mail />,
            route:'/dashboard/messages'
        },
        {
            id:2,
            name:'Experience',
            icon:<History />,
            route:'/dashboard/experience'
        },
        {
            id:3,
            name:'Sectors',
            icon: <Factory />,
            route: '/dashboard/experience/sectors'
        }
    ];

    return (
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
                <CardHeader className={`title-bar`} title={`Dashboard`}/>
                <CardContent style={{padding:20}}>
                    <ul className={`service-list`}>
                        {sections.map((section,index) => (
                            <li key={`section-${section.id}`}>
                                <Link to={section.route}>{section.icon} {section.name}</Link>
                            </li>
                        ))}
                    </ul>
                </CardContent>
            </Card>
        </Grid>
    )
}
