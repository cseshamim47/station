#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int narr[n];

    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        narr[i] = arr[i];
    }
    sort(arr,arr+n);

    vector<pair<int,int>> v;
    int l = INT_MAX, h = -1; 
    int ansl = INT_MAX;
    int ansh = INT_MIN;
    int diff = -1;
    for(int i = 1; i < n; i++)
    {
        if(arr[i]-arr[i-1] <= 1)
        {
           l = min(l,arr[i-1]);
           h = max(h,arr[i]); 
        }else
        {
            if(h != -1)
            {
                v.push_back({l,h});
                if(diff <= h-l)
                {
                    if(diff == h-l)
                    {
                        int a = find(narr,narr+n,l)-narr;
                        int b = find(narr,narr+n,ansl)-narr;
                        ansl = narr[min(a,b)];
                        if(ansl == l) ansh = h;
                    }else ansl = l, ansh = h;
                    diff = h-l;
                }
            }
            l = arr[i];
            h = -1;
        }
    }
    cout << ansl << " " << ansh << endl;
    
}

int32_t main()
{
    solve();    
}