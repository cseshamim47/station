#include <bits/stdc++.h>
using namespace std;

int main()
{
    //    Bismillah
    vector<int> v[3];

    v[0].push_back(1);
    v[0].push_back(1);
    v[0].push_back(1);

    v[1].push_back(2);
    v[1].push_back(2);
    v[1].push_back(2);
    
    v[2].push_back(3);
    v[2].push_back(3);
    v[2].push_back(3);

    for(auto i : v)
    {
        for(auto j : i)
        {
            cout << j << " ";
        }
        cout << endl;
    }
}