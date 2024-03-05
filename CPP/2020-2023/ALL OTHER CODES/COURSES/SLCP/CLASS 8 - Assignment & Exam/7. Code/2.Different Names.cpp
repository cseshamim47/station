#include <bits/stdc++.h>
using namespace std;

void solve()
{
    unordered_map<string,int> m;
    string str;
    getline(cin,str);
    string tmp = "";
    str.push_back(' ');
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] == ' ') m[tmp]++,tmp = "";
        else tmp.push_back(str[i]);
    }
    
    auto it = m.begin();
    for(it ; it != m.end(); it++)
    {
        if(it->second > 1) cout << it->first << " "  << it->second << endl;
    }
}

int main()
{
    solve();    
}