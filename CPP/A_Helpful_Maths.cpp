#include <bits/stdc++.h>
using namespace std;

int main()
{
    string str;
    cin >> str;
    queue<char>q;
    vector<int>v;

    for(int i = 0; i < str.size(); i++){
        q.push(str[i]);
        if(str[i]!='+'){
            string temp;
            temp.push_back(str[i]);
            int x = stoi(temp);
            v.push_back(x);
        }
        sort(v.begin(),v.end());
    }
    int m = 0;
    for(int i = 0; i < str.size(); i++){
        if(str[i] != '+'){
            cout << v[m];
            m++;
        } 
        else cout << str[i];
    }



    
}