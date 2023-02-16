

import React, {useEffect} from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {Link, useParams} from "react-router-dom";
import {cardStyle} from "../../../../snippets/cardStyle";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../../services/icons/icons";
import ClientAddressEditData from "./ClientAddressEditData";
import {viewClientAddress} from "../../../../redux/actions/clientAddressActions";
import {useAppDispatch, useAppSelector} from "../../../../redux/hooks/hooks";
export default function ClientAddressEdit() {
    let params = useParams()
    const dispatch = useAppDispatch();
    useEffect(()=>dispatch(viewClientAddress(params.id)),[])
    const clientAddress = useAppSelector(state => state.clientAddress.clientAddress);

    console.log(clientAddress)

    const showCard = () => {
        return clientAddress.client_id !== undefined
    }

    const card = () => {
        return (
            <Grid item xs={12}>
                <Card elevation={2}
                      style={cardStyle}
                >
                    <CardHeader
                        className={`title-bar`}
                        title={`View/Edit Client Address`}
                        action={
                            <>
                                <Link to={`/dashboard/clients/`+clientAddress.client_id}>
                                    <FontAwesomeIcon icon={getBrandIcon(`faArrowCircleLeft`)} />
                                </Link>
                            </>
                        }
                    />
                    <CardContent>
                        <ClientAddressEditData clientAddress={clientAddress} />
                    </CardContent>
                </Card>
            </Grid>
        )
    }

    return (
        <>{showCard() && card()}</>
    )

}
