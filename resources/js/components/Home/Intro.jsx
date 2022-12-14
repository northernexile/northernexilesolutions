
import {Card, CardContent, CardHeader} from "@mui/material";
import React, {useEffect, useState} from "react";
import Typography from "@mui/material/Typography";
import {Link} from "react-router-dom";
import ContentService from "../../services/ContentService";
import getBrandIcon from "../../services/icons/icons";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import IconButton from "@mui/material/IconButton";
import Button from "@mui/material/Button";
import {ContactMail} from "@mui/icons-material";

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
                       paddingTop: 8,
                       paddingLeft:0,
                       paddingRight:0,
                       paddingBottom:8,
                       margin:8
                   }}
            >
                <CardHeader className="title-bar"
                    action={
                        <div>
                            <FontAwesomeIcon icon={getBrandIcon('faInfo')} />
                        </div>
                    }
                    title="About us
                "/>
                <CardContent>
                    <Typography variant="p" component="div" style={{
                        marginBottom:8
                    }}>{content.text}</Typography>
                    <Typography variant="p" component="div">
                        <Link title="Contact us" to="/contact">
                            <Button variant="contained" endIcon={<ContactMail/>}>Get in touch</Button>
                        </Link>
                    </Typography>
                </CardContent>
            </Card>
    )
}

export default Intro
