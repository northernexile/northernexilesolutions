
import React, {useEffect} from "react";
import {Grid} from "@mui/material";
import Intro from './Intro'
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks"
import {getPage} from "../../redux/actions/pageActions";
import WordCloud from "./WordCloud";
import Services from "./Services";

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
            <Grid style={{marginTop:0}}
                spacing={2}
                justifyContent="center"
                container item xs={12}>
                <Grid className="intro-card" style={{ marginTop:50, backgroundImage: "url(/images/YatRock.jpg)" }} item xs={12} md={12}>
                    <Intro />
                </Grid>
                <Grid item xs={12} md={4}>
                    <Services />
                </Grid>
                <Grid item xs={12} md={8}>
                    <WordCloud />
                </Grid>
            </Grid>
        </>
    )
};

export default Home;
