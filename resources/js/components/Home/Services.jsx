import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks";
import {getServices} from "../../redux/actions/serviceActions";
import React,{useEffect} from "react";
import {Card, CardContent, CardHeader} from "@mui/material";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../services/icons/icons";


const  Services = () => {
    const dispatch = useAppDispatch()
    const services = useAppSelector(state => state.services.services)

    useEffect(() => {
        dispatch(getServices())
    }, [])
    return (
        <Card elevation={2}
              style={{
                  paddingTop: 0,
                  paddingLeft:0,
                  paddingRight:0,
                  paddingBottom:8,
                  margin:8
              }}
        >
            <CardHeader
                className="title-bar"
                title={'Services'}
                action={
                    <div>
                        <FontAwesomeIcon icon={getBrandIcon('faIndustry')} />
                    </div>
                }
            />
            <CardContent className={`service-card`}>
                <ul className={`service-list`}>
                    {services.map((service,index) => (
                        <li key={`service-${service.id}`}>{service.name}</li>
                    ))}
                </ul>
            </CardContent>
        </Card>
    )
}

export default Services
