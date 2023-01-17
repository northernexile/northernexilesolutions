
import {Card, CardContent, CardHeader} from "@mui/material";
import React, {useEffect} from "react";
import Typography from "@mui/material/Typography";
import {Link} from "react-router-dom";
import getBrandIcon from "../../services/icons/icons";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import Button from "@mui/material/Button";
import {ContactMail} from "@mui/icons-material";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks"
import {getContent} from "../../redux/actions/contentActions";

const Intro = () => {
    const dispatch = useAppDispatch()
    const content = useAppSelector(state => state.content.active)

    useEffect(() => {
        retrieveContent()
    }, []);

    const retrieveContent = () => {
        dispatch(getContent(1))
    }

    return (
            <Card elevation={2}
                   style={{
                       paddingTop: 0,
                       paddingLeft:0,
                       paddingRight:0,
                       paddingBottom:8,
                       margin:8,
                       marginBottom:32,
                       backgroundColor:'rgba(255,255,255,0.8)'
                   }}
            >
                <CardHeader className="title-bar"
                    action={
                        <div>
                            <FontAwesomeIcon icon={getBrandIcon('faInfo')} />
                        </div>
                    }
                    title="About us"/>
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
