const repoOwner = 'C3La-NS';
const repoName = 'ChatX';

async function checkForNewRelease() {
  try {
    const response = await fetch(`https://api.github.com/repos/${repoOwner}/${repoName}/releases/latest`);
    const data = await response.json();
    const latestVersion = data.tag_name;

    if (compareVersions(currentVersion, latestVersion) === -1) {
      const badge = document.createElement("sup");
      badge.innerText = `New: ${latestVersion}`;
      document.querySelector('aside li span').appendChild(badge);
    }
  } catch (error) {
    console.error('Error fetching the latest release:', error);
  }
}

function compareVersions(version1, version2) {
  const v1 = version1.split('.').map(Number);
  const v2 = version2.split('.').map(Number);

  for (let i = 0; i < v1.length; i++) {
    if (v1[i] > v2[i]) {
      return 1;
    } else if (v1[i] < v2[i]) {
      return -1;
    }
  }

  return 0;
}

checkForNewRelease();