import React from "react"
import {Card, CardContent, CardHeader} from "@mui/material";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../services/icons/icons";

export default function Sectors() {
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
                <CardHeader
                    className="title-bar"
                    action={
                        <div>
                            <FontAwesomeIcon icon={getBrandIcon('faIndustry')} />
                        </div>
                    }
                    title={'Sectors'}
                />
                <CardContent>
                </CardContent>
            </Card>
    )
}
