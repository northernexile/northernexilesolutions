
import React, {useEffect, useState} from "react";
import {Grid} from "@mui/material";
import Intro from './Intro'
import Technologies from "./Technologies";
import Sectors from "./Sectors";
import PageService from "../../services/PageService";


const Home = React.FC = () => {
    const [page, setPage] = useState([]);

    useEffect(() => {
        retrievePage()
    }, []);

    const retrievePage = () => {
        PageService.get(1).then((response) => {
            setPage(response.data.data.page);
        }).catch((e) => {
            console.log(e);
        })
    }

    return (
        <>
            <Grid
                spacing={2}

                justifyContent="center"
                container item xs={12}>
                <Grid item xs={7}>
                    <Intro />
                </Grid>
                <Grid item xs={3}>
                    <Technologies />
                    <Sectors />
                </Grid>
            </Grid>
        </>
    )
};

export default Home;
