import React from "react"
import {Card, CardContent, CardHeader} from "@mui/material";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {faLaravel,
    faBootstrap,
    faPhp,
    faSymfony,
    faMagento,
    faLess,
    faHtml5,
    faShopify,
    faVuejs,
    faReact,
    faAws,
    faWordpress,
    faAngular,
    faPython} from '@fortawesome/free-brands-svg-icons'

export default function Technologies() {
    return (

            <Card elevation={2}
            style={{
            padding: 8,
            marginTop:8,
            marginBottom:8
        }}
            >
                <CardHeader title={'Technologies'}/>
                <CardContent>
                    <FontAwesomeIcon icon={faLaravel} />
                </CardContent>
            </Card>
    )
}
