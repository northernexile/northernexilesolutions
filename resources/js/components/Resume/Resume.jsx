
import React, {useEffect, useState} from "react";
import {Card, CardContent, CardHeader, Grid, Tab, Tabs} from "@mui/material";
import CV from "./CV";
import Box from "@mui/material/Box";
import Graphs from "./Graphs";
import Education from "./Education";
import {TabContext, TabList, TabPanel} from "@mui/lab";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks";
import {getCv} from "../../redux/actions/cvActions";
import {getChart} from "../../redux/actions/chartActions";

export default function Resume() {

    const [tabIndex,setTabIndex] = useState("1")

    const dispatch = useAppDispatch()
    const cv = useAppSelector(state => state.cv.cv)

    useEffect(()=>{
        dispatch(getCv())
    },[])

    const frameworks = useAppSelector(state => state.chart.chart);

    useEffect(() => dispatch(getChart()),[])

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
                            <Graphs frameworks={frameworks} />
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
