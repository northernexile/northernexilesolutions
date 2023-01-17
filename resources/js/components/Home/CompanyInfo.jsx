
import React,{useEffect} from "react";
import {useAppDispatch,useAppSelector} from "../../redux/hooks/hooks";
import {get} from '../../redux/actions/companyActions'
import {Card, CardContent} from "@mui/material";
import Typography from "@mui/material/Typography";


const CompanyInfo = () => {
    const dispatch = useAppDispatch();
    const company = useAppSelector(state => state.company.company)

    useEffect(() =>{
        dispatch(get())
    },[])

    return (
        <Card className="company-info"
            style={{
                paddingTop: 0,
                paddingLeft:0,
                paddingRight:0,
                paddingBottom:8,
                margin:8,
                marginBottom:64,
                backgroundColor:'rgba(255,255,255,0.8)'
            }}
        >
            <CardContent>
                <Typography align="center" variant="p" component="div" style={{
                    marginBottom:4
                }}>Companies House Number: {company.companiesHouseNumber}</Typography>

                <Typography align="center" variant="p" component="div" style={{
                    marginBottom:4
                }}>VAT Registered: {company.vatNumber}</Typography>
            </CardContent>
        </Card>
    )
}

export default CompanyInfo
