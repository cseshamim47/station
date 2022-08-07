#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    vector<pair<int,int>> v,cv;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        v.push_back({x,i});
    } 
    cv = v;
    sort(v.rbegin(),v.rend());
    n++;
    int middle = n/2; 
    if(n&1) middle++;
    int left = middle-1;
    int right = middle+1;

    int arr[n+10]{0};
    int j = 0;
    int cnt = n-1;
    int sum = 0;

    while(cnt--)
    {
        int idx = v[j].second;
        int numberOfTimes = v[j++].first;
        sum += (abs(middle-right)*numberOfTimes);
        arr[idx] = right++;
        cnt--;
        if(cnt < 0) break;
        idx = v[j].second;
        numberOfTimes = v[j++].first;
        sum += (abs(middle-left)*numberOfTimes);
        arr[idx] = left--;
    }
    cout << sum*2 << endl;
    cout << middle << " ";
    for(int i = 0; i < n-1; i++)
    {
         cout << arr[i] << " ";
    }
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}