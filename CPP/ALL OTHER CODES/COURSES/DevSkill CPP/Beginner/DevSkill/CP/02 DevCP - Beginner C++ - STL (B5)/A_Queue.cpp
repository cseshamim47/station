// Time complexity O(n)

#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t,quantum,T=0;
    cin >> t >> quantum;

   queue< pair<string,int> >Q;
    
    for(int i = 0; i < t; i++){
        string name;
        int time;
        cin >> name >> time;
        Q.push(make_pair(name,time));
        // cout << pr.first << " " << pr.second << endl;
    }

    queue<int>q;
    int i = 0;
    while(!Q.empty()){
        pair<string,int> temp = Q.front();
        Q.pop();
        if(quantum >= temp.second ){
            T += temp.second;
            cout << temp.first << " " << T << '\n';
        }else{
            T += quantum;
            temp.second = temp.second - quantum;
            Q.push(temp);
        }
        i++;
    }
}