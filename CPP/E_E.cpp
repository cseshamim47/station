#include <bits/stdc++.h>
using namespace std;

int main()
{
    //    Bismillah
    int n,k;
    cin >> n >> k;
    vector<int> v;
    for(int i = 0; i < n; i++)
    {
        v.push_back(i);
    }

    do{
        int p = 0;
        for(int i = 0; i < n; i++)
        {
            if((v[i]+v[(i+2)%n])%k != 0)
            {
                p = 1;
                break;
            }
        }
        if(p == 0)
        {
            for(auto x : v)
            {
                cout << x << " ";
            }
            cout << endl;
        }
    }while(next_permutation(v.begin(),v.end()));
}