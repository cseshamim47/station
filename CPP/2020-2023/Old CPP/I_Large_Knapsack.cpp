#include <bits/stdc++.h>
using namespace std;


int main()
{
    ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
    int wt,n;
    cin >> wt >> n;
    vector<pair<int,int>> v(n+1);
    for(int i = 1; i <= n; i++)
    {
        cin >> v[i].first >> v[i].second;
    }

    int prev[wt+1] = {};

    for(int i = 1; i <= n; i++)
    {
        for(int j = wt; j >= 1; j--)
        {
            int value = v[i].first;
            int weight = v[i].second;
            int take,nottake;
            nottake = take = 0;
            if(weight <= j)
            {
                take = value + prev[j-weight];
            }
            nottake = prev[j];
            prev[j] = max(take,nottake);
        }
       
    }
    
    cout << prev[wt] << endl;
}