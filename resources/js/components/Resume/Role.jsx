import React from "react"
import {Paper, Grid, Typography, Chip} from "@mui/material";

const Role = (item) => {
    const roleItem = item.item

    const projects = () => {
        return roleItem.projects.map((project,index)=>(
            <li>{project.description}</li>
        ))
    }

    const showProjects = () => {
        return roleItem.projects.length > 0
    }

    console.log(showProjects())

    const projectSection = () => {
        return (showProjects())
            ? <ul>{projects()}</ul>
            : ''
    }

    const chips = () => {
        return roleItem.chips.map((chip,index) =>(
            <Chip style={{marginRight:2,marginBottom:2}} size={`small`} label={chip.name} />
        ))
    }

    return (
        <Paper style={{padding:8,marginBottom:8}}>
            <Grid container spacing={2}>
                <Grid item xs={8}>
                    <Typography variant={`h6`} >{roleItem.title}</Typography>
                </Grid>
                <Grid item xs={4}>
                    <Typography variant={`h6`}>{roleItem.startMonthYear} - {roleItem.endMonthYear}</Typography>
                </Grid>
                <Grid item xs={12}>
                    <Typography variant={`p`}>{roleItem.description}</Typography>
                    {projectSection()}
                </Grid>
                <Grid item xs={12}>
                    {chips()}
                </Grid>
            </Grid>
        </Paper>
    )
}

export default Role
