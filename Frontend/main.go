package main

import (
    "encoding/json"
    "html/template"
    "log"
    "net/http"
)

type Hero struct {
///
}

func main() {
    http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        resp, err := http.Get("http://127.0.0.1:8000/api/AREMPLACER") 
        if err != nil {
            log.Fatal(err)
        }
        defer resp.Body.Close()

        var TABLE []TABLE
        if err := json.NewDecoder(resp.Body).Decode(&TABLE); err != nil {
            log.Fatal(err)
        }

        tmpl := template.Must(template.ParseFiles("ICI.html")) 
        if err := tmpl.Execute(w, TABLE); err != nil {
            log.Fatal(err)
        }
    })

    log.Fatal(http.ListenAndServe(":8040", nil)) 
}




