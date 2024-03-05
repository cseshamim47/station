#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006
void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}
void bruteforce()
{}

int Case;
int prevJ;
int prevSum;
int s[25];
vector<int> ans;
void subseq(vector<int> &v,int i,int j,int t)
{
    // cout << "ashsi" << endl;
    if(i == v.size())
    {
        int sum = 0;
        vector<int> tmp;
        for(int i = 0; i < j; i++)
        {
            sum += s[i];
            tmp.push_back(s[i]);
        }
        if(sum <= t && sum >= prevSum)
        {
            if(j < prevJ && sum == prevSum) return;
            ans = tmp;
            prevJ = j;
            prevSum = sum;
        }
        return;   
    }
    subseq(v,i+1,j,t);
    s[j] = v[i];  
    subseq(v,i+1,j+1,t);
}

void solve()
{
    // int z;
    // cin >> z;
    int t,n;
    while(cin >> t >> n)
    {
        vector<int> v;
        v.resize(n);
        for(int i = 0; i < n; i++) 
        {
            cin >> v[i];   
        }
        subseq(v,0,0,t);
        for(auto x : ans) cout << x << " ";
        cout << "sum:" << prevSum << endl; 

        prevSum = 0;
        prevJ = 0;
        ans.clear();
    }
}

int32_t main()
{
      //        Bismillah
    fileInput();
    // BOOST
    // vector<int> arr{1,3,8};
    // w(t)
    solve();
    //bruteforce();
}