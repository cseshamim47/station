#include <bits/stdc++.h>
using namespace std;

#define ll long long
#define MAX 1000006

bool comp(pair<int,int> &pa, pair<int,int> &pb)
{
    double a = (double)pa.first/pa.second;
    double b = (double)pb.first/pb.second;
    return pa.first * pb.second > pa.second*pb.first;
}

int main()
{
    int N,W;
    cin >> N >> W;
    vector<pair<int,int>> vp;

    for(int i = 0; i < N; i++)
    {
        int x;
        cin >> x;
        vp.push_back(make_pair(x,0));
    }
    for(int i = 0; i < N; i++)
    {
        int x;
        cin >> x;
        vp[i].second = x;
    }
    sort(vp.begin(),vp.end(),comp);

    double totalProfit = 0;
    for(int i = 0; i < N; i++)
    {
        double perKg = (double)vp[i].first/vp[i].second;
        int canTake = min(vp[i].second,W);
        totalProfit += 1.00 * canTake*perKg;
        W -= canTake;
        if(W <= 0) break;
    }

    cout << setprecision(2) << fixed << totalProfit << endl;
    // for(auto i : vp) cout << i.first << " " << i.second << endl;
    
}