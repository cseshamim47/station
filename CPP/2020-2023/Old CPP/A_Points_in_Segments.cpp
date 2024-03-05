// //Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
// #include <bits/stdc++.h>
// using namespace std;
// #define MAX 10000005
// #define ll long long
// #define gch getchar();
// #define cls system("cls");
// #define dbg cout << "Debug LN : " << __LINE__ << endl;
// #define w(t) while(t--){ solve(); }


// int Case;
// int lowerBound(vector<int> &v, int lb){
//     int L = 0;
//     int R = v.size();
//     int M;
//     while (L<R)
//     {
//         M = L+(R-L)/2;
//         if(v[M] < lb) L = M+1;
//         else R = M;    
//     }
//     return L;
// }

// int upperBound(vector<int> &v, int lb){
//     int L = 0;
//     int R = v.size();
//     int M;
//     while (L<R)
//     {
//         M = L+(R-L)/2;
//         if(v[M] <= lb) L = M+1;
//         else R = M;    
//     }
//     return L;
// }

// void solve(){ 
//     int size, tc;
//     cin >> size >> tc;
//     vector<int> v;
//     for (int i = 0; i < size; i++)
//     {
//         int x;
//         cin >> x;
//         v.push_back(x);
//     }
//     int flag = 0;
//     while(tc--)
//     {
//         int p1,p2;
//         cin >> p1 >> p2;
//         if(!flag)
//             cout << "Case " << ++Case << ":" << "\n";
//         // cout << upperBound(v,p2) - lowerBound(v,p1) << endl;
//         // cout << lowerBound(v,p2+1) - lowerBound(v,p1) << endl;
//         cout << upperBound(v,p2) - upperBound(v,p1-1) << endl;
//         flag++;
//     }
//     flag = 0;
    
// }
// int main()
// {
//      //        Bismillah
//     // cls
//     int t;   cin >> t;   w(t);

// }


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

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int n,m;
    cin >> n >> m;
    set<int> s;
    while(n--)
    {
        int p1,p2;
        cin >> p1 >> p2;
        for(int i = p1; i <= p2; i++)
        {
            s.insert(i);
        }
    }
    cout << m-s.size() << endl;
    for(int i = 1; i <= m; i++)
    {
        if(s.find(i) == s.end()) cout << i << " ";
    }
    printf("\n");
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}