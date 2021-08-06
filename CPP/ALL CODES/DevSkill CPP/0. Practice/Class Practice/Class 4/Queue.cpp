#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n, quantum,processTime,T = 0;
    string processName;
    cin >> n >> quantum;

    queue< pair<string, int> > Q;
    
    for(int i = 0; i < n; i++){
        cin >> processName >> processTime;
        Q.push(make_pair(processName,processTime));
    }

    while(!Q.empty()){
        pair <string, int> temp = Q.front();
        Q.pop();
        if(temp.second<= quantum){
            T += temp.second;
            cout << temp.first << ' ' << T << '\n';
        }else{
            T += quantum;
            temp.second -= quantum;
            Q.push(temp);
        }
    }
    
}