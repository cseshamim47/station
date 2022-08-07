#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t;
    cin >> t;
    while(t--){
        vector<int>v;
        int n;
        cin >> n;
        for(int i = 0; i<n; i++){
            int x;
            cin >> x;
            v.push_back(x);
        }
        auto maxx = find(v.begin(), v.end(), *max_element(v.begin(), v.end()));
        auto minn = find(v.begin(), v.end(), *min_element(v.begin(), v.end()));
        int maxIdx = distance(v.begin(),maxx);
        int minIdx = distance(v.begin(),minn);

        // cout << maxIdx << " " << minIdx << endl;
        int size = v.size();
        if(minIdx > maxIdx) swap(minIdx,maxIdx);
        cout << min({maxIdx+1, minIdx+1+size-maxIdx, size-minIdx}) << endl;

    }
    
}