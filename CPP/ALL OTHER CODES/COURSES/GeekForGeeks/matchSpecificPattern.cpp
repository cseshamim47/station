#include <bits/stdc++.h>
using namespace std;

int main()
{
    vector <string> ans;

    int n;
    cin >> n;
    string s[n];
    for(int i = 0; i < n; i++){
        cin >> s[i];
    }
    string pattern;
    cin >> pattern;

    for(auto word : s){

        int hash1[26] = {0};
        int hash2[26] = {0};
        int i;
        for(i = 0; i < word.size(); i++){

            if(hash1[word[i] - 'a'] == hash2[pattern[i] - 'a']){
                hash1[word[i] - 'a']++;
                hash2[pattern[i] - 'a']++;
            }else{ break; }
        }
        if(word.size() == i){
            ans.push_back(word);
        }
    }

    for(auto x : ans) cout << x << " ";


}