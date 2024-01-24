package main

import (
    "bytes"
    "encoding/json"
    "html/template"
    "io/ioutil"
    "log"
    "net/http"
)

type User struct {
    Nom      string `json:"nom"`
    Prenom   string `json:"prenom"`
    Mail     string `json:"mail"`
    Password string `json:"password"`
    Success  bool   `json:"success"`
}

func main() {
    http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        resp, err := http.Get("http://127.0.0.1:8000/api/users") 
        if err != nil {
            log.Fatal(err)
        }
        defer resp.Body.Close()

        if resp.StatusCode != http.StatusOK {
            log.Fatalf("expected status OK, got %v", resp.Status)
        }

        bodyBytes, _ := ioutil.ReadAll(resp.Body)
        bodyString := string(bodyBytes)
        log.Println(bodyString)

        resp.Body = ioutil.NopCloser(bytes.NewBuffer(bodyBytes))

        var users []User
        if err := json.NewDecoder(resp.Body).Decode(&users); err != nil {
            log.Fatal(err)
        }

        tmpl := template.Must(template.ParseFiles("ICI.html")) 
        if err := tmpl.Execute(w, users); err != nil {
            log.Fatal(err)
        }
    })

    log.Fatal(http.ListenAndServe(":8080", nil))
}