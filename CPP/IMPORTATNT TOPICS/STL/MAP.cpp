//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

void basicMap()
{
    map<int,string> m;
    m[1] = "shamim";
    m[2] = "shanto";
    m[3] = "shanto";

    m.insert({4,"newname"});
    map<int,string>::iterator it;
    for(it = m.begin(); it != m.end(); it++)
    {
        cout << (*it).first << " " << it->second << endl;
    }
}

void unique_ordered_map()
{
    map<string,int> m;
    for(int i = 0; i < 5; i++)
    {
        string str;
        cin >> str;
        m[str] = m[str] + 1;
    }
    for(auto pr : m) cout << pr.first << " " << pr.second << endl;
}

int main()
{
    // basicMap();
    unique_ordered_map();
}