
import React, {useEffect} from "react";
import {Grid} from "@mui/material";
import Intro from './Intro'
import Technologies from "./Technologies";
import Sectors from "./Sectors";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks"
import {getPage} from "../../redux/actions/pageActions";

const Home = () => {
    const dispatch = useAppDispatch()
    const page = useAppSelector(state => state.pages.active)

    useEffect(() => {
        retrievePage(1)
    }, []);

    const retrievePage = (id) => {
        dispatch(getPage(id))
    }

    return (
        <>
            <Grid
                spacing={2}

                justifyContent="center"
                container item xs={12}>
                <Grid item xs={12} md={6}>
                    <Intro />
                </Grid>
                <Grid item xs={12} md={4}>
                    <Technologies />
                    <Sectors />
                </Grid>
            </Grid>
        </>
    )
};

export default Home;
