//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }

void solve()
{
    int n,k;
    cin >> n >> k;
    vector<int> v,vd;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        v.push_back(x);
    }
    vd = v;
    sort(vd.begin(),vd.end());
    int cnt = 1;
    for(int i = 0; i < n-1; i++)
    {
        if(v[i] > v[i+1]) cnt++;
        else
        {
            int x = lower_bound(vd.begin(),vd.end(),v[i]) - vd.begin();
            int y = lower_bound(vd.begin(),vd.end(),v[i+1]) - vd.begin();
            x++;
            if(x != y) cnt++;
        }
    }
    if(cnt <= k) cout << "Yes" << "\n";
    else cout << "No" << "\n";
}

int main()
{
      //        Bismillah
    ios::sync_with_stdio(false);
    cin.tie(NULL);
    int t;   cin >> t;   w(t);
    

}