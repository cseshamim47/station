#include <bits/stdc++.h>
using namespace std;
const int N = 2*100001;
using ll = long long;
 
vector<int>g[N];
int d1[N];
int d2[N];
int n, x;
void dfs(int v, int par, int dep, int *d) {
    d[v] = dep;
    for (auto u : g[v]) {
        if (u != par) {
            dfs(u, v, dep + 1, d);
        }
    }
}
 
int main() {
    cin >> n >> x;
    // --x;
    for (int i = 0; i < n - 1; ++i) {
        int u,v;
        cin >> u >> v;
        // --u, --v;
        g[u].push_back(v);
        g[v].push_back(u);
    }
    dfs(1,0,0,d1);
    dfs(x,0,0,d2);
    int ans = 0;
    for (int i = 1; i <= n; ++i) {
        if (d2[i] < d1[i]) {
            ans = max(ans, d1[i]);
        }
    }
    cout << 2*ans << '\n';
    return 0;
}