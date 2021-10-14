#include <bits/stdc++.h>
using namespace std;

bool cmp(pair<string,double> &a, pair<string,double> &b)
{
    return a.second > b.second;
}

void solve()
{
    int n;
    cin >> n;
    int k = n;
    vector<pair<string,double>> vp; 

    while(k--)
    {
        string str;
        cin >> str;
        int m1,m2,m3;
        cin >> m1 >> m2 >> m3;
        double avg = 1.00 * (m1 + m2 + m3)/3;
        vp.push_back({str,avg});
    }
    sort(vp.begin(),vp.end(),cmp);

    for(int i = 0; i < n; i++)
    {
        cout << i+1 << " " << vp[i].first << endl;
    }
}

int main()
{
    solve();    
}