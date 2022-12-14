
import {Card, CardContent, CardHeader} from "@mui/material";
import React, {useEffect, useState} from "react";
import Typography from "@mui/material/Typography";
import {Link} from "react-router-dom";
import ContentService from "../../services/ContentService";

const Intro = React.FC = () => {
    const [content, setContent] = useState([]);

    useEffect(() => {
        retrieveContent()
    }, []);

    const retrieveContent = () => {
        ContentService.get(1).then((response) => {
            setContent(response.data.data.content);
        }).catch((e) => {
            console.log('error')
        })
    }

    return (
            <Card elevation={2}
                   style={{
                       padding: 8,
                       marginTop:8,
                       marginBottom:8
                   }}
            >
                <CardHeader title="About us"/>
                <CardContent>
                    <Typography variant="p" component="div" >{content.text}</Typography>
                    <Typography variant="p" component="div"><Link title="Contact us" to="/contact">Contact us</Link></Typography>
                </CardContent>
            </Card>
    )
}

export default Intro
