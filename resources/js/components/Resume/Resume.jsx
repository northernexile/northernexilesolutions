
import React, {useEffect, useState} from "react";
import {Card, CardContent, CardHeader, Grid, Tab, Tabs} from "@mui/material";
import CV from "./CV";
import Box from "@mui/material/Box";
import Graphs from "./Graphs";
import Education from "./Education";
import {TabContext, TabList, TabPanel} from "@mui/lab";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks";
import {getCv} from "../../redux/actions/cvActions";
import {getChart,getAllCharts} from "../../redux/actions/chartActions";

export default function Resume() {

    const [tabIndex,setTabIndex] = useState("1")

    const dispatch = useAppDispatch()
    const cv = useAppSelector(state => state.cv.cv)
    const charts = useAppSelector(state => state.chart.charts);

    useEffect(()=>{
        dispatch(getCv()).then(()=>dispatch(getAllCharts()))
    },[])

    console.log(charts)

    const getChartItem = (key) => {
        return charts.find((chart)=>{
            return chart.title === key
        })
    }

    const graphs = () => {
        return (charts.length > 0)
            ? graphMarkup()
            : <></>
    }

    const graphMarkup = () => {
        return (<Graphs
                sectors={getChartItem('sector')}
                frameworks={getChartItem('framework')}
                technologies={getChartItem('technology')}
            />)

    }

    const handleChange = (event, newValue) => {
        setTabIndex(newValue);
    };

    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={{
                      paddingTop: 0,
                      paddingLeft:0,
                      paddingRight:0,
                      paddingBottom:8,
                      margin:8,
                      marginTop:80,
                      marginBottom:32,
                      backgroundColor:'rgba(255,255,255,0.8)'
                  }}
            >
                <CardHeader className={`title-bar`} title={`Experience`}/>
                <CardContent>
                    <TabContext value={tabIndex}>
                        <Box sx={{ borderBottom: 1, borderColor: "divider" }}>
                            <TabList onChange={(event,newValue) => {handleChange(event,newValue)}}>
                                <Tab label="Work History" value="1" />
                                <Tab label="Technical Record" value="2" />
                                <Tab label="Education" value="3" />
                            </TabList>
                        </Box>
                        <TabPanel  value="1">
                            <CV cv={cv} />
                        </TabPanel>
                        <TabPanel value="2">
                            {graphs()}
                        </TabPanel>
                        <TabPanel value="3">
                            <Education />
                        </TabPanel>
                    </TabContext>
                </CardContent>
            </Card>
        </Grid>
    )
}
